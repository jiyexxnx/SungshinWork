import random
import string
import time

VOWELS = 'aeiou'
CONSONANTS = 'bcdfghjklmnpqrstvwxyz'
HAND_SIZE = 7

SCRABBLE_LETTER_VALUES = {
    'a': 1, 'b': 3, 'c': 3, 'd': 2, 'e': 1, 'f': 4, 'g': 2, 'h': 4, 'i': 1, 'j': 8, 'k': 5, 'l': 1, 'm': 3, 'n': 1, 'o': 1, 'p': 3, 'q': 10, 'r': 1, 's': 1, 't': 1, 'u': 1, 'v': 4, 'w': 4, 'x': 8, 'y': 4, 'z': 10
}

# -----------------------------------
# Helper code
# (you don't need to understand this helper code)

WORDLIST_FILENAME = "words.txt"

def load_words():
    ##print "Loading word list from file..."
    # inFile: file
    inFile = open(WORDLIST_FILENAME, 'r', 0)
    # wordlist: list of strings
    wordlist = []
    for line in inFile:
        wordlist.append(line.strip().lower())
    ##print "  ", len(wordlist), "words loaded."
    return wordlist

def get_frequency_dict(sequence):
    # freqs: dictionary (element_type -> int)
    freq = {}
    for x in sequence:
        freq[x] = freq.get(x,0) + 1
    return freq

"""
# (end of helper code)
# -----------------------------------

#
# Problem #1: Scoring a word
#
"""
def get_word_score(word, n=HAND_SIZE):
    score = 0
    if word:
        for letter in word:
            score += SCRABBLE_LETTER_VALUES[letter]
        if len(word) == n:
            score += 50
    return score

def display_hand(hand):
    for letter in hand.keys():
        for j in range(hand[letter]):
            print letter,              # print all on the same line
    print                              # print an empty line

#
# Make sure you understand how this function works and what it does!
#
def deal_hand(n):
    hand={}
    num_vowels = n / 3
    
    for i in range(num_vowels):
        x = VOWELS[random.randrange(0,len(VOWELS))]
        hand[x] = hand.get(x, 0) + 1
        
    for i in range(num_vowels, n):    
        x = CONSONANTS[random.randrange(0,len(CONSONANTS))]
        hand[x] = hand.get(x, 0) + 1
        
    return hand

#
# Problem #2: Update a hand by removing letters
#
def update_hand(hand, word):
    new_hand = {}
    word_freq = get_frequency_dict(word)
    for letter in hand:
        new_hand[letter] = hand[letter] - word_freq.get(letter, 0)
    return new_hand

#
# Problem #3: Test word validity
#
def is_valid_word(word, hand, word_list):
    word_dict = get_frequency_dict(word) # convert string to dictionary(string -> int), same as hand
    for key in word_dict:
        if word_dict[key] > hand.get(key, 0):
            return False
    return word in word_list

#
# Problem #4: Playing a hand (of pset 5)
# Problem #1, #2 (of pset 6)
#
def play_hand(hand, word_list):
    total_score = 0
    time_limit = input("Enter time limit, in seconds, for players: ")
    time_left = time_limit
    assert isinstance(time_limit, int) and time_limit > 0, 
    while True:
        print "Current hand:",
        display_hand(hand)
        start_time = time.time()
        entered = raw_input("Enter word, or a . to indicate that you are finished: ")
        end_time = time.time()
        time_took = end_time - start_time # time spent while enter word
        time_left -= time_took
        word = entered.strip()

        if time_left >= 0:
            if word == '.':
                break
            if not is_valid_word(word, hand, points_dict):
                print "Invalid word input: not a word. please try again.\n"
                continue

            print "It took %.2f seconds to provide an answer." % time_took

            # after a little experiment, which is, let Python excute the following code:
            # >>>start = time.time();end = time.time();print end-start
            # I found that the result on my laptop is around 1e-6(it may vary on other computers), so I suppose a human can not input a word in less
            # than 1e-6 senconds(he has to spend some time to think), and 1e-6 certainly can divide an integer without throw a zero divide error.
            # So I just let time took divide the score.
            score = get_word_score(word)/time_took
            total_score += score
            print "%r earned %d Points. Total: %d\n" % (word, score, total_score)
            hand = update_hand(hand, word)
        else:
            print "Total time exceeds %d seconds. You scored %.2f points" % (time_limit, total_score)
            break
    # on exit
    print "Total score: %.2f points." % total_score

#
# Problem #5: Playing a game
# Make sure you understand how this code works!
# 
def play_game(word_list):
    # TO DO ...
#    print "play_game not implemented."         # delete this once you've completed Problem #4
#    play_hand(deal_hand(HAND_SIZE), word_list) # delete this once you've completed Problem #4

    ## uncomment the following block of code once you've completed Problem #4
    hand = deal_hand(HAND_SIZE) # random init
    while True:
        cmd = raw_input('Enter n to deal a new hand, r to replay the last hand, or e to end game: ')
        if cmd == 'n':
            hand = deal_hand(HAND_SIZE)
            play_hand(hand.copy(), word_list)
            print
        elif cmd == 'r':
            play_hand(hand.copy(), word_list)
            print
        elif cmd == 'e':
            break
        else:
            print "Invalid command."

# \ Build data structures used for entire session and play game
#
if __name__ == '__main__':
    word_list = load_words()
    #play_game(word_list)
    play_hand(dict(a=1,c=1,i=1,h=1,m=2,z=1), word_list)