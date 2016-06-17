#!/bin/bash

#git config --global user.name "YOUR NAME"
#git config --global user.email "YOUR EMAIL ADDRESS"
clear
echo "-----------------------"
echo "------UPLOAD GIT-------"
echo "-Nome file da caricare-"
echo "-----------------------"
read nomeFile
git add $nomeFile
echo "-----------------------"
echo "-Inserisci modifiche:--"
echo "-----------------------"
read modifiche
git commit -m "$modifiche"
git push
echo "-----------------------"
echo "---Upload completato---"
echo "-----------------------"
