'''
bubble.py
LEE JIYEON
2019.01.14
'''
import testdat

def bubble_sort(data):
    count = 0
    for i in range(len(data)-1):
        for j in range(len(data)-1-i):
            count +=1
            if data[j] > data[j+1]:
                temp = data[j]
                data[j] = data[j+1]
                data[j+1] = temp
    return (count,data)
    
(count1,dat1_sorted)=bubble_sort(testdat.dat1)
print("比較回数 :", count1)
for k in range(-1,-20,-1):
    print(dat1_sorted[k],end=" ")
print()

(count2,dat2_sorted)=bubble_sort(testdat.dat2)
print("比較回数 :", count2)
for k in range(-1,-20,-1):
    print(dat2_sorted[k],end=" ")
print()

(count3,dat3_sorted)=bubble_sort(testdat.dat3)
print("比較回数 :", count3)
for k in range(-1,-20,-1):
    print(dat3_sorted[k],end=" ")




 