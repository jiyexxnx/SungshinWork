# -*- coding: utf-8 -*-
"""
Created on Mon Oct 28 13:19:50 2019

@author: 이지연
"""

#diachar.py
#作成者：LEEJIYEON

def prdiachar(s):
    for i in range(len(s)):
        m=""
        for j in range(i+1):
            m +=s[j]
        print (m)
    a=1
    for i in range(len(s)-1):
        m=""
        for j in range(i+1):
            m += " "
        for j in range(a,len(s)):
            m += s[j]
        print (m)
        a +=1
s=input("文字例: ")
prdiachar(s)


    