# -*- coding: utf-8 -*-
"""
Created on Mon Oct 21 15:30:56 2019

@author: 이지연
"""

#diamond.py 
# 作成者：LEEJIYEON

n = int(input('n = '))
if n%2 == 0:
    for i in range(1,int(n/2)+1):
        s = ""
        for j in range(int(n/2)-i+1):
            s += " "
        for j in range(2*i-1):
            s += "*"
        print(s) 
    for i in range(int(n/2),0,-1):
        s = ""
        for j in range (int(n/2)-i+1):
            s += " "
        for j  in range(2*i-1):
            s += "*"
        print(s)
else:
    for i in range(int(n/2)):
        s = ""
        for j in range(int(n/2)-i):
            s += " "
        for j in range(2*i+1):
            s += "*"
        print(s)   
    for i in range(int(n/2)+1):
        s= ""
        for j in range(i):
            s+= " "
        for j in range(2*(int(n/2)-i)+1):
            s += "*"
        print(s)