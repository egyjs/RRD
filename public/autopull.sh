#!/usr/bin/env bash
cd  "$1"
pwd

git reset --hard HEAD
git pull origin master

