A = int(input()) # 숫자로 받고
B = input() # 문자열 그대로 

print(A * int(B[-1])) # 문자열의 인덱스로 진행.
print(A * int(B[-2]))
print(A * int(B[-3]))
print(A * int(B))