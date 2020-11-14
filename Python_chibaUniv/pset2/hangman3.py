# Problem Set 2, hangman.py
# Name: LEE JI YEON
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
    # inFile: file
    inFile = open(WORDLIST_FILENAME, 'r')
    # line: string
    line = inFile.readline()
    # wordlist: list of strings
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
secret_word ="tact"
letters_guessed = ["a","s","t"] 
print(  is_word_guessed(secret_word, letters_guessed))      


def get_guessed_word(secret_word, letters_guessed):
    get_guessed_word = " "
    for i in secret_word:
        if i in letters_guessed:
            get_guessed_word += i
        else:
            get_guessed_word += "_ "
    return  get_guessed_word



def get_available_letters(letters_guessed):
    import string
    
    available_letters = string.ascii_lowercase
    get_available_letters = " "
    for i in available_letters:
        if i not in letters_guessed:
            get_available_letters += i
    return get_available_letters
    
    

def hangman(secret_word):    
    letters_guessed = []
    warnings_remaining = 3
    guesses_remaining = 6
    vowel = ['a','e','i','o','u']
    unique_letters = []
    
    for letter in secret_word:
        if letter not in unique_letters:
            unique_letters += letter
    print("Welcome to the game Hangman!")
    print("I am thinking of a word that is", len(secret_word),"letters long.")
    print("You have 3 warnings left.")
    print("-" * 20)
    while True:
        print("You have", guesses_remaining, "guesses left.")
        print("Available letters:", get_available_letters(letters_guessed))
        guess = input("Please guess a letter:" )
        if guess.isalpha()==False:
            warnings_remaining -= 1
            if warnings_remaining < 0:
                print("You have no warnings left so you lose one guess:", \
                      get_guessed_word(secret_word, letters_guessed))
                guesses_remaining -= 1
                continue
            print("Oops! That is not a valid letter. You have",  warnings_remaining,\
                "warnings_remaining:", get_guessed_word(secret_word, letters_guessed))
            print("-" * 20) 
            continue
        elif guesses_remaining < 1:
            print("Oops! That is not a valid letter. You have",get_guessed_word\
                  (secret_word, letters_guessed))
            print("-" * 20)
            print("Sorry, you ran out of guesses. The word was", secret_word)
            break
        else:
            guess = guess.lower()
            if guess in letters_guessed:
                warnings_remaining -= 1
                if warnings_remaining < 0:
                    print("You have no warnings left so you lose one guess:", \
                          get_guessed_word(secret_word, letters_guessed))
                    guesses_remaining -= 1
                    continue
                else:
                    print("Oops! You've already guessed that letter. You have",\
                          warnings_remaining, "warnings left.")
                    print(get_guessed_word(secret_word, letters_guessed))
                    print("-" * 20)
                    continue
            
            elif guess in secret_word and guess not in letters_guessed:
                                                   
                letters_guessed += guess
                print("Good guess: ",get_guessed_word(secret_word, letters_guessed))
                print("-" * 20)
                print( is_word_guessed(secret_word, letters_guessed))
                if is_word_guessed(secret_word, letters_guessed) == True:
                
                    print("Congratulations, you won!")
                    print("Your total score for this game is :", guesses_remaining\
                          * len(unique_letters))
                    break 
                else:
                    continue
            elif guess not in secret_word and guess in vowel:
                               
                guesses_remaining -= 2
                letters_guessed += guess
                
                if guesses_remaining < 1:
                    print("Oops!That letter is not in my word:", \
                          get_guessed_word(secret_word, letters_guessed) )
                    print("-" * 20)
                    print("Sorry, you ran out of guesses. The word was", secret_word)
                    break
                print("Oops!That letter is not in my word:", get_guessed_word\
                      (secret_word, letters_guessed) )
                print("-" * 20)
                continue
            
            
               
            else:
                                            
                guesses_remaining -= 1
                letters_guessed += guess
                if guesses_remaining < 1:
                    print("Oops!That letter is not in my word:", get_guessed_word\
                          (secret_word, letters_guessed) )
                    print("-" * 20)
                    print("Sorry, you ran out of guesses. The word was", secret_word)
                    break
                print("Oops!That letter is not in my word:", get_guessed_word\
                      (secret_word, letters_guessed) )
                print("-" * 20)
                    
if __name__ == "__main__":
    # pass

    # To test part 2, comment out the pass line above and
    # uncomment the following two lines.
  secret_word = choose_word(wordlist)
  hangman(secret_word)
