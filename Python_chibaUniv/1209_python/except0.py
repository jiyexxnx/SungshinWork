print("整数１÷整数２を求めましょう")

num1=int(input("整数1="))
num2=int(input("整数2="))

quotion = num1//num2
remain = num1 % num2
print(num1,"÷",num2,"は",quotion,"あまり",remain,"です")