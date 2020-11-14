# -*- coding: utf-8 -*-

# pi.py 
# 作成者：LEEJIYEON
import math
low=0
high=5
epsilon=0.0000001
num_guesses=0
while True:
    num_guesses += 1
    guess = (high+low)/2.0
    print("low=",low,"guess=",guess,"high=",high)
    if abs (-math.cos(guess/2)) < epsilon:
        break;
    if -math.cos(guess/2)<0:
        low = guess
    else:
        high =guess
print('num_guess=',num_guesses)
print('guess=',guess)
