import numpy

class Triangle():
    def __init__(self, x, y):
        self.x = x
        self.y = y
    
    def cheak (self,p1,p2,p3):
        MA = Triangle(self.x-p1.x, self.y-p1.y)
        MB = Triangle(self.x-p2.x, self.y-p2.y)
        MC = Triangle(self.x-p3.x, self.y-p3.y)
        a = MA.x *MB.y - MA.y *MB.x
        b = MB.x *MC.y - MB.y *MC.x
        c = MC.x *MA.y - MC.y *MA.x
        if (a<=0 and b<=0 and c<=0) or (a>0 and b>0 and c>0):
            return True
        return False
    
p1 = Triangle (0.5,1.1)
p2 = Triangle (5.1,0.1)
p3 = Triangle (2.1,8.5)

count = 0

for i in range(100000):
    x = numpy.random.uniform(0.0,10.0)
    y = numpy.random.uniform(0.0,10.0)
    p = Triangle(x,y)
    if p.cheak(p1,p2,p3):
        count += 1

print("三角形の近似面積:  ",(count/100000)*(10.0*10.0))
