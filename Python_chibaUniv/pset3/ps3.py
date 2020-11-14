# -*- coding: utf-8 -*-
"""
Created 2019-12-12

@author: LEE JI YEON
"""

import math
import random
import string

VOWELS = 'aeiou'
CONSONANTS = 'bcdfghjklmnpqrstvwxyz'
HAND_SIZE = 7

SCRABBLE_LETTER_VALUES = {
    'a': 1, 'b': 3, 'c': 3, 'd': 2, 'e': 1, 'f': 4, 'g': 2, 'h': 4, 'i': 1, 'j': 8, 'k': 5, 
    'l': 1, 'm': 3, 'n': 1, 'o': 1, 'p': 3, 'q': 10, 'r': 1, 's': 1, 't': 1, 'u': 1, 'v': 4, 
    'w': 4, 'x': 8, 'y': 4, 'z': 10, '*': 0
}

WORDLIST_FILENAME = "words.txt"



def load_words():
   
    
    print("Loading word list from file...")
    # inFile: file
    inFile = open(WORDLIST_FILENAME, 'r')
    # wordlist: list of strings
    wordlist = []
    for line in inFile:
        wordlist.append(line.strip().lower())
    print(len(wordlist), "words loaded.")
    return wordlist


def get_frequency_dict(sequence):
    
    # freqs: dictionary (element_type -> int)
    freq = {}
    for x in sequence:
        freq[x] = freq.get(x,0) + 1
    return freq
	

def get_word_score(word, n):  
    letter_points = sum([SCRABBLE_LETTER_VALUES.get(letter, 0) for letter in word.lower()])
    word_length_points = max(1, 7 * len(word) - 3 * (n - len(word)))
    return letter_points * word_length_points


def display_hand(hand):   
    for letter in hand.keys():
        for j in range(hand[letter]):
             print(letter, end=' ')      
    print()                              


def deal_hand(n):
    hand={}
    num_vowels = int(math.ceil(n / 3)) - 1
    
    hand['*'] = 1

    for i in range(num_vowels):
        x = random.choice(VOWELS)
        hand[x] = hand.get(x, 0) + 1
    
    for i in range(num_vowels, n):    
        x = random.choice(CONSONANTS)
        hand[x] = hand.get(x, 0) + 1
    
    return hand


def update_hand(hand, word):
  
    return {char: max(0, hand[char] - word.lower().count(char)) for char in hand}
    

def is_valid_word(word, hand, word_list):
    word = word.lower()
    word_freq_dict = get_frequency_dict(word)
    word_reconciles_with_hand = not any([
        count > hand.get(char, 0) for char, count in word_freq_dict.items()
    ])

    possible_words = [word.replace('*', vowel) for vowel in VOWELS]
    word_in_list = any([possible_word in word_list for possible_word in possible_words])
    
    return word_in_list and word_reconciles_with_hand


def calculate_handlen(hand):
  
    return sum(hand.values())

    
def play_hand(hand, word_list):
    total_score = 0
    while calculate_handlen(hand) > 0:
        print('Current Hand: ', end='')
        display_hand(hand)
        word = input('Enter word, or "!!" to indicate that you are finished: ')
        if word == '!!':
            break
        else:
            if is_valid_word(word, hand, word_list):
                word_score = get_word_score(word, calculate_handlen(hand))
                total_score += word_score
                print(
                    '"{0}" earned {1} points. Total: {2} points'
                    .format(word, word_score, total_score)
                )
            else:
                print('That is not a valid word.')
            
            hand = update_hand(hand, word)
                
    print('')
    if word != '!!':
        print('You ran out of letters.')
    print('Total score for this hand: {0} points'.format(total_score))
    return total_score


def substitute_hand(hand, letter):    
    if letter not in hand.keys():
        return hand
    else:
        all_letters = list(CONSONANTS + VOWELS)
        candidate_letters = [
            candidate_letter for candidate_letter in all_letters 
            if candidate_letter not in hand.keys() and candidate_letter != letter
        ]
        substitute_letter = random.choice(candidate_letters)
        substitute_hand = {
            (substitute_letter if old_letter == letter else old_letter): count
            for old_letter, count in hand.items()        
        }
        return substitute_hand
        
         
def play_game(word_list):
    number_of_hands = int(input('Enter a total number of hands: '))
    total_score = 0
    number_of_substitions = 1
    for hand_number in range(number_of_hands):
        hand = deal_hand(HAND_SIZE)
        print('Current hand: ', end='')
        display_hand(hand)
        if (number_of_substitions) > 0:
            substitution_desire = ''
            while substitution_desire not in ['y', 'n']:
                substitution_desire = input('Would you like to substitute a letter (y or n)? ')
                if substitution_desire.lower() == 'y':
                    number_of_substitions -= 1
                    substitution_letter = input('Which letter would you like to replace? ')
                    hand = substitute_hand(hand, substitution_letter)
        total_score += play_hand(hand, word_list)
        print('-' * 10)
    print('Total score over all hands: {0}'.format(total_score))


if __name__ == '__main__':
    word_list = load_words()
    play_game(word_list)