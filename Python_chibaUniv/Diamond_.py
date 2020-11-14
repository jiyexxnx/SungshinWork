n = int(input('n = '))
if n%2 == 0:
    for i in range(1,int(n/2)+1):
        s = ""
        for j in range(int(n/2)-i+1):
            s += " "
        for j in range(2*i-1):
            s += "*"
        print(s) 
    for i in range(int(n/2),0,-1):
        s = ""
        for j in range (int(n/2)-i+1):
            s += " "
        for j  in range(2*i-1):
            s += "*"
        print(s)
else:
    for i in range(int(n/2)):
        s = ""
        for j in range(int(n/2)-i):
            s += " "
        for j in range(2*i+1):
            s += "*"
        print(s)   
    for i in range(int(n/2)+1):
        s= ""
        for j in range(i):
            s+= " "
        for j in range(2*(int(n/2)-i)+1):
            s += "*"
        print(s)
