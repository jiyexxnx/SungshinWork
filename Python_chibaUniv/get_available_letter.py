# -*- coding: utf-8 -*-
"""
Created on Mon Nov 11 13:07:33 2019

@author: 이지연
"""
#get_available_letter.py
#name : Lee Ji Yeon

import string
def get_available_letters(letters_guessed):
     A=""
     for i in range(26):
        if string.ascii_lowercase [i] not in letters_guessed:
            A += string.ascii_lowercase[i]
     return A
    
print(get_available_letters(['e', 'i', 'k', 'p', 'r', 's']))
print(get_available_letters(['a','z']))
print(get_available_letters(['a','b','c','d','e','f','g','h','i','j',
    'k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z']))
print(get_available_letters([]))