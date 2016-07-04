#!/usr/bin/python

import MySQLdb
import time
import subprocess
from sense_hat import SenseHat


#FUNZIONI
def run(command):
    output = subprocess.check_output(command, shell=True)
    return output
	
#create database
db = MySQLdb.connect(host="localhost",    # your host, usually localhost
                     user="root",         # your username
                     passwd="mysqladmin",  # your password
                     )
cur = db.cursor()
cur.execute("CREATE DATABASE IF NOT EXISTS servermanager;")
db.close()


#create table
db = MySQLdb.connect(host="localhost",    # your host, usually localhost
                     user="root",         # your username
                     passwd="mysqladmin",  # your password
                     db="servermanager")        # name of the data base
cur = db.cursor()
cur.execute("CREATE TABLE IF NOT EXISTS dati (ID INT NOT NULL AUTO_INCREMENT, date DATE, time TIME, cpu DECIMAL(4,1), mem DECIMAL(4,1), temp DECIMAL(4,1), pres DECIMAL(5,1), humi DECIMAL(4,1), PRIMARY KEY (ID))COLLATE='latin1_swedish_ci' ENGINE=InnoDB;")
cur.execute("CREATE TABLE IF NOT EXISTS moduli (ID INT NOT NULL AUTO_INCREMENT, nome VARCHAR(20), nomefile VARCHAR(20), descrizione VARCHAR(500), img VARCHAR(100), categoria VARCHAR(100), PRIMARY KEY (ID))COLLATE='latin1_swedish_ci' ENGINE=InnoDB;")
#cur.execute("""INSERT INTO moduli (nome, nomefile, descrizione, img, categoria) VALUES (%s, %s, %s, %s, %s);""",("apache","apache.php","descrizione","apache.png", "web"))
#cur.execute("""INSERT INTO moduli (nome, nomefile, descrizione, img, categoria) VALUES (%s, %s, %s, %s, %s);""",("mysql","mysql.php","descrizione","mysql.png", "database"))


#HAT
sense = SenseHat() 
while True:
	cpu = run("ps aux | awk {'sum+=$3;print sum'} | tail -n 1")
	mem = run("ps aux | awk {'sum+=$4;print sum'} | tail -n 1")
	t = sense.get_temperature()
	p = sense.get_pressure()
	h = sense.get_humidity()
	t = round(t, 1)
	p = round(p, 1)
	h = round(h, 1)
	cur.execute("""INSERT INTO dati (date, time, cpu, mem, temp, pres, humi) VALUES (CURRENT_DATE(), NOW(), %s, %s, %s, %s, %s);""",(cpu,mem,t,p,h))
	db.commit()
	print "inserito"
	time.sleep(1)


db.close()
