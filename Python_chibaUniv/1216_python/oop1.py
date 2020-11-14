class Coordinate(object):
    def __init__(self, x, y):
        self.x = x
        self.y = y

    def distance(self,other):
        x_diff_sq = (self.x - other.x) **2
        y_diff_sq = (self.y - other.y) **2
        return (x_diff_sq + y_diff_sq) **0.5

x1 = float(input("座標１のｘを入れてください: "))
y1 = float(input("座標１のｙを入れてください: "))
x2 = float(input("座標２のｘを入れてください: "))
y2 = float(input("座標２のｙを入れてください: "))

a = Coordinate (x1,y1)
b = Coordinate (x2,y2)

print("2点間の距離:%.2f" % Coordinate.distance(a,b))