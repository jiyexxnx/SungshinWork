class Coordinate(object):
    def __init__(self, x, y):
        self.x = x
        self.y = y

    def distance(self,other):
        x_diff_sq = (self.x - other.x) **2
        y_diff_sq = (self.y - other.y) **2
        return (x_diff_sq + y_diff_sq) **0.5

x = float(input("x座標を入れてください: "))
y = float(input("y座標を入れてください: "))

c = Coordinate(x,y)
zero = Coordinate(0,0)
print("原点からの距離: %.2f" % c.distance(zero))