# -*- coding: utf-8 -*-
"""
Created on Mon Nov 11 13:06:15 2019

@author: 이지연
"""
#is_word_guessed.py
#name : Lee Ji Yeon

def is_word_guessed(secret_word, letters_guessed):
    for i in range(len(secret_word)):
        if secret_word [i] not in letters_guessed:
            return False
    return True
    
    #secret_word: 英字文字列，当てるべき単語（すべて小文字であると仮定してよい）
#letters_guessed: 英字のリスト，当てるべく推測した文字（すべて小文字であると仮定してよい）
#returns: 論理型，secret_wordに含まれる文字が全てletters_guessed中にあればTrue，そうでなければFalse


print(is_word_guessed('apple', ['e', 'i', 'k', 'p', 'r', 's']))
print(is_word_guessed('apple', ['a', 'p', 'l', 'e']))
print(is_word_guessed('apple', ['a', 'p', 'l']))
print(is_word_guessed('apple', ['e', 'l', 'p', 'a']))
print(is_word_guessed('apple', ['p', 'l', 'e']))
print(is_word_guessed('apple', ['a', 'x', 'p', 'y', 'l', 'e']))
print(is_word_guessed('apple', []))
print(is_word_guessed('a', ['a']))
print(is_word_guessed('a', ['b']))

