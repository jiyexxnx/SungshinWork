"""
#氏名：LEE JI YEON
#2019.11.18
#kaibun1.py
"""


def kaibun(s):
    '''
    回文かどうかをチェックする
    s: 以下に示す「ひらがな」のみからなる文。常にこの条件を満たすと仮定してよい。
    return: 回文ならTrue、そうでないならFalse

ひらがな：
　あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよわん
    '''
    if len(s) <=1:
         return True
    else:
        return s[0] == s[-1] and kaibun(s[1:-1])

print(kaibun("わたしまけましたわ"))  # 私負けましたわ
print(kaibun("わたしはまけました"))  # 私は負けました
print(kaibun("いかたべたかい"))    # イカ食べたかい
print(kaibun("いかたべたいかい"))   # イカ食べたいかい
print(kaibun("あ"))
print(kaibun("ちばだいがく"))     # 千葉大学
print(kaibun("いい"))
#print(kaibun("しらとりとらじ"))    # 白鳥取らじ
#print(kaibun("わるいてつさくがくさっているわ"))    # 悪い鉄柵が腐っているわ