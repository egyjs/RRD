#!/usr/bin/env bash
cd  "$1"
pwd

git reset --hard HEAD
git clean -d -f
git pull origin master


