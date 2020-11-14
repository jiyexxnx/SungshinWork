class Triangle(object):
    def __init__(self, x, y):
        self.x = x
        self.y = y

    def distance(self,other):
        x_diff_sq = (self.x - other.x) **2
        y_diff_sq = (self.y - other.y) **2
        return (x_diff_sq + y_diff_sq) **0.5

    def area(self,point1,point2):
        return 0.5* abs((self.x*point1.y+point1.x*point2.y+point2.x*self.y)-(point1.x*self.y+point2.x*point1.y+self.x*point2.y))   

x1 = float(input("座標1のxを入れてください: "))
y1 = float(input("座標1のyを入れてください: "))
x2 = float(input("座標2のxを入れてください: "))
y2 = float(input("座標2のyを入れてください: "))
x3 = float(input("座標3のxを入れてください: "))
y3 = float(input("座標3のyを入れてください: "))

a = Triangle (x1,y1)
b = Triangle (x2,y2)
c = Triangle (x3,y3)

print("三角形の面積:%.2f" % Triangle.area(a,b,c))