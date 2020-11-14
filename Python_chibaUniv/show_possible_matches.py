# -*- coding: utf-8 -*-
"""
Created on Mon Nov 11 13:08:38 2019

@author: 이지연
"""
#get_available_letter.py
#name : Lee Ji Yeon


wordlist = ['a', 'an', 'cat', 'tact', 'test', 'yesterday']

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
    
def show_possible_matches(my_word):
    
    """
    my_word = my_word.replace(' ', '')
    possible_matches = []
    for word in wordlist:
        if match_with_gaps(my_word, word):
            possible_matches.append(word)
    print(" ".join(possible_matches))
    
    """
    s = ""
    my_word = my_word.replace(' ', '')
    for i in wordlist:
        if match_with_gaps(my_word,i):
            s += i
            s += " "
    if s == "":
        s="No matches found"
    print(s)
        
show_possible_matches("t_ _ t")
show_possible_matches("tac_ ")
show_possible_matches("an")
show_possible_matches("_ _ _ ")
show_possible_matches("_ _ _ _ _ ")