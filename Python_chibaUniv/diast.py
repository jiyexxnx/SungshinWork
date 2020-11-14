# -*- coding: utf-8 -*-
"""
Created on Mon Oct 28 13:01:55 2019

@author: 이지연
"""

#diast.py 
#作成者：LEEJIYEON
 
for i in range(5):
    s=''
    for j in range(i+1):
        s += "*"
    print(s)
for i in range(4):
    s=''
    for j in range(i):
        s +=' '
    for j in range(4-i):
        s +='*'
    print(s)
    