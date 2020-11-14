'''
3つの整数リスト（要素数100、1,000、1万）があります。（課題32と同じです）
（testdat.py をダウンロードして使います。ソースコードから、import testdat とし、testdat.dat1, testdat.dat2, testdat.dat3 でアクセスできます）
クイックソートを実装し、比較回数と、ソート結果の上位20個を表示するプログラムを書いて提出してください。(qsort.py)
 dat1: 500, [1,2,3...]
 dat2: 50000, [1,2,3...]
 dat3: 5000000, [1,2,3...]

下記に注意してください。
・再帰は使わずにループで実装します。（関数の先頭で、64個のピボット領域を確保）///재귀사용금지(함수의 앞에서 64개의 피봇영역을 확보)
・ピボット値は、先頭・真ん中・末尾の３つを比較し、中央値を選びます。///피봇값은 앞,중간,끝의 3개를 비해서 중앙값을 선택한다.
・C言語ソースでの参考。（GNU C Library のループ版クイックソート）
（なお下記の実装を含めて、良い性能を持つクイックソート実装では、要素が少なくなると挿入ソートにポリシーを変えますが、今回はその処理は不要です）
'''
import testdat

def partition(list, l, h):
    i = (l-1)
    x = list[h]

    for j in range(l,h):
        if list[j] <= x:
            i = i+1
            list[i], list[j]= list[j], list[i]
        
    list[i+1],list[h] = list[h],list[i+1]
    return (i+1)

def quicksort(list, l, h):
    size = h - l + 1
    stack = [0] * (size)
    
    top = -1
    top = top + 1
    stack[top] = l
    top = top + 1
    stack[top] = h

    count = 0
    
    while top >= 0:
        h = stack[top]
        top = top-1
        l = stack[top]
        top = top-1

        p = partition (list,l,h)
        count +=1

        if p-1 > l:
            top = top + 1
            stack[top] = l 
            top = top + 1
            stack[top] = p - 1 

        if p+1 < h:
            top = top + 1
            stack[top] = p + 1
            top = top + 1
            stack[top] = h

    return count

count1 = quicksort(testdat.dat1,0,len(testdat.dat1)-1)
print("비교횟수 : ", count1)
for k in range(-1,-21,-1):
    print(testdat.dat1[k],end = " ")
print ()

count2 = quicksort(testdat.dat2,0,len(testdat.dat2)-1)
print("비교횟수 : ", count2)
for k in range(-1,-21,-1):
    print(testdat.dat2[k],end = " ")
print ()

count3 = quicksort(testdat.dat3,0,len(testdat.dat3)-1)
print("비교횟수 : ", count3)
for k in range(-1,-21,-1):
    print(testdat.dat3[k],end = " ")
print ()




