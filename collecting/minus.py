a, b = map(int,input().split())
print(a-b)

# a,b = input().split()
# a = int(a)
# b = int(b)


'''
input() 함수는 문자열을 집어넣는 함수
split() 함수는 띄어쓰기 기준으로 자르는 함수 / 두 변수를 둘다 받아 줄 수있게.
한줄로 입력을 가능 input().split()

a,b를 정수로 받으려면 map을 이용해 입력받는 값을 한번에 
int로 형 변환할 수있음.
'''