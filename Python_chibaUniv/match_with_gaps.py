# -*- coding: utf-8 -*-
"""
Created on Mon Nov 11 13:08:12 2019

@author: 이지연
"""
#get_available_letter.py
#name : Lee Ji Yeon

def match_with_gaps(my_word, other_word):
    my_word = my_word.replace(' ', '')
    if len(my_word) == len(other_word):
        hidden_letters = []
        for i,c in enumerate(my_word):
            if c == other_word[i]:
                continue
            elif c == '_':
                hidden_letters.append(other_word[i])
            else:
                return False
        for hidden_letter in hidden_letters:
            if hidden_letter in my_word:
                return False          
        return True
    else:
        return False    
print(match_with_gaps("te_ t", "test"))
print(match_with_gaps("te_ t", "tact"))
print(match_with_gaps("a", "a"))
print(match_with_gaps("a_ _ le", "banana"))
print(match_with_gaps("a_ _ le", "apple"))
print(match_with_gaps("a_ ple", "apple"))
print(match_with_gaps("_ ", "a"))
print(match_with_gaps("te_ t", "tester"))