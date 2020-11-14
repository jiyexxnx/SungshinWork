import string

print("整数１÷整数２を求めましょう")

flag = 0

num1 = input("整数1=")
if num1.isdigit():
    num1 = int(num1)
else:
    print("整数を入力してください")
    flag = 1

if flag != 1:
    num2 = input("整数2=")
    if num2.isdigit():
        num2 = int(num2)
    else:
        print("整数を入力してください")
        flag = 1

if flag == 0 :
    quotion = num1//num2
    remain = num1 % num2
    print(num1,"÷",num2,"は",quotion,"あまり",remain,"です")
