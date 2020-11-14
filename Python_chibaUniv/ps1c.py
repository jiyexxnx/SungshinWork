# -*- coding: utf-8 -*-
"""
Created on Mon Oct 28 14:59:52 2019

@author: 이지연
"""

#ps1c.py
#作成者：LEEJIYEON

annual_salary = float(input("enter the starting salary :"))
total_cost=1000000
semi_annual_raise=0.07
portion_down_payment=0.25
down_payment=total_cost*portion_down_payment
epsilon=100

low = 0
high=10000
guess=(low+high)/2
current_savings= 0
num_guesses =1

while abs(current_savings - down_payment) >= epsilon:
    current_savings = 0
    monthly_salary = annual_salary/12
    for month in range(1,37):
        current_savings += monthly_salary * guess/10000 + current_savings*0.04/12
        if month % 6 == 0:
            monthly_salary += monthly_salary*semi_annual_raise
    if current_savings < down_payment and guess >= 5000:
        print("It is impossible to pay down payment in three years.")
        break
    elif current_savings < down_payment:
        low = guess
    elif current_savings > down_payment and current_savings - down_payment < epsilon:
        print("Best savings rate: ", guess/10000)
        print("Steps in bisection search:", num_guesses)
        break
    else:
        high = guess
    guess = (low + high)//2
    num_guesses += 1
    
    