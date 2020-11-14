# -*- coding: utf-8 -*-
"""
Created on Mon Nov 11 13:06:32 2019

@author: 이지연
"""
#get_guessed_word.py
#name : Lee Ji Yeon

def get_guessed_word(secret_word, letters_guessed):
     A=""
     for i in range(len(secret_word)):
        if secret_word [i] not in letters_guessed:
            A += "_ "            
        else:
            A += secret_word[i]
     return A
    
print(get_guessed_word('apple', ['e', 'i', 'k', 'p', 'r', 's']))
print(get_guessed_word('apple', ['a', 'p', 'l', 'e']))
print(get_guessed_word('apple', ['a', 'p', 'l']))
print(get_guessed_word('apple', ['e', 'l', 'p', 'a']))
print(get_guessed_word('apple', ['p', 'l', 'e']))
print(get_guessed_word('apple', ['a', 'x', 'p', 'y', 'l', 'e']))
print(get_guessed_word('apple', []))
print(get_guessed_word('a', ['a']))
print(get_guessed_word('a', ['b']))