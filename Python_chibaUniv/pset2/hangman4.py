# Problem Set 2, hangman.py
# Name: LEE JIYEON
# Collaborators:
# Time spent:

# Hangman Game
# -----------------------------------
# Helper code
# You don't need to understand this helper code,
# but you will have to know how to use the functions
# (so be sure to read the docstrings!)
import random
import string

WORDLIST_FILENAME = "words.txt"

def load_words():
   
    print("Loading word list from file...")
   
    inFile = open(WORDLIST_FILENAME, 'r')
  
    line = inFile.readline()
   
    wordlist = line.split()
    print("  ", len(wordlist), "words loaded.")
    return wordlist

def choose_word(wordlist):
   
    return random.choice(wordlist)

wordlist = load_words()

def is_word_guessed(secret_word, letters_guessed):
   
    for i in secret_word:
        if i not in letters_guessed:
          return False
    
    return True 

def get_guessed_word(secret_word, letters_guessed):
   
    guessed_word =""
    for i in secret_word:
        if i in letters_guessed:
            guessed_word += i
        else:
            guessed_word += "_ " 
    return guessed_word

def get_available_letters(letters_guessed):
    available_letters = ""
    for i in string.ascii_lowercase:
        if i not in letters_guessed:
            available_letters += i
           
    return available_letters

def match_with_gaps(my_word, other_word):
    
    my_word= my_word.replace(" ", "")
    
    if len(my_word)!=len(other_word):
        return False
    else:
        i = 0
        for char in my_word:
            if char !="_" and char != other_word[i]:
                return False
                                     
            elif char =="_" and other_word[i] in set(my_word):
                return False
            else:
                i+=1
        return True  
    
def show_possible_matches(my_word):
    possible_matches =[]
    for other_word in wordlist:
        if match_with_gaps(my_word, other_word) == True:
            print(other_word,end="  ")
            possible_matches += other_word
        
    if len(possible_matches) == 0:
        print("No matches found") 

def hangman_with_hints(secret_word):
    letters_guessed = []
    warnings_remainging = 3
    guesses_remaining = 6
    vowel = ['a','e','i','o','u']
    
    print("Welcome to the game Hangman!")
    print("I am thinking of a word that is", len(secret_word),"letters long.")
    print("-"*8) 
    while True:
        print("You have", guesses_remaining, "guesses left.")
        print("Available letters: ",get_available_letters(letters_guessed))
        guess = input("Please guess a letter:" )
        if guess == "*":
            my_word = get_guessed_word(secret_word, letters_guessed)
            show_possible_matches(my_word)
            print("-"*8)
            continue
            
        elif guess != "*" and guess.isalpha() == False:
            warnings_remainging -= 1
            if warnings_remainging < 0:
                print("You have no warnings left so you lose one guess:", get_guessed_word(secret_word, letters_guessed) )
                guesses_remaining -= 1
                continue
            print("Oops! That is not a valid letter. You have",warnings_remainging, "warnings_remaining:", get_guessed_word(secret_word, letters_guessed))
            print("-"*8) 
            continue  
        elif guesses_remaining <1:
            print("Oops! That is not a valid letter.",get_guessed_word(secret_word, letters_guessed)  )
            print("-"*8)
            print("Sorry, you ran out of guesses. The word was", secret_word)
            break
                    
                    
            
        else:
            guess = guess.lower()
            if guess in letters_guessed:
                warnings_remainging -= 1
                if warnings_remainging < 0:
                    print("You have no warnings left so you lose one guess:", get_guessed_word(secret_word, letters_guessed) )
                    guesses_remaining -= 1
                    continue
                else:
                    print("Oops! You've already guessed that letter. You have",warnings_remainging, "warnings left.")
                    print(get_guessed_word(secret_word, letters_guessed))
                    print("-"*8)
                    continue
           
                
            elif  guess in secret_word and guess not in letters_guessed:
                letters_guessed += guess    
                print("Good guess: ", get_guessed_word(secret_word, letters_guessed))
                print("-"*8)
                if is_word_guessed(secret_word, letters_guessed)==True:
                    print("Congratulations, you won!")
                    print("Your total score for this game is:",guesses_remaining *len(set(secret_word )))
                    break
                continue    
   
   
            elif guess not in secret_word and guess in vowel:
                guesses_remaining -= 2
                letters_guessed += guess
                
                if guesses_remaining < 1:
                
               
                    print("Oops!That letter is not in my word:",get_guessed_word(secret_word, letters_guessed)  )
                    print("-"*8)
                    print("Sorry, you ran out of guesses. The word was", secret_word)
                    break
                
                print("Oops!That letter is not in my word:",get_guessed_word(secret_word, letters_guessed)  )
                print("-"*8)
                continue
                
            else:
                guesses_remaining -= 1
                letters_guessed += guess
                
                if guesses_remaining < 1:
                    print("Oops!That letter is not in my word:",get_guessed_word(secret_word, letters_guessed)  )
                    print("-"*8)
                    print("Sorry, you ran out of guesses. The word was", secret_word)
                    break
                 
                print("Oops!That letter is not in my word:",get_guessed_word(secret_word, letters_guessed)  )
                print("-"*8)
                continue
        
        if is_word_guessed(secret_word, letters_guessed)==True:
            print("Congratulations, you won!")
            print("Your total score for this game is:",guesses_remaining *len(set(secret_word)))
            break
        else:
            print("Sorry, you ran out of guesses. The word was", secret_word)        


wordlist = load_words()
secret_word =choose_word(wordlist)
letters_guessed =[]
my_word = get_guessed_word(secret_word, letters_guessed)
hangman_with_hints('apple')