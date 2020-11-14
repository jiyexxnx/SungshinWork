"""
#氏名：LEE JI YEON
#2019.11.18
#kaibun2.py
"""

def kaibun(s):
    '''
    回文かどうかをチェックする
    s: 以下に示す「ひらがな」のみからなる文。常にこの条件を満たすと仮定してよい。
    return: 回文ならTrue、そうでないならFalse
	辞書を用いて文字の正規化を行ったうえで照合する。

ひらがな：
　あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよわん
　がぎぐげござじずぜぞだぢづでどばびぶべぼぱぴぷぺぽぁぃぅぇぉっゃゅょゎ
    '''
    rdict = {'が':'か', 'ぎ':'き', 'ぐ':'く', 'げ':'け', 'ご':'こ',
             'ざ':'ざ', 'じ':'し', 'ず':'す', 'ぜ':'せ', 'ぞ':'そ',
             'だ':'た', 'で':'で', 'ど':'と','っ':'つ',
             'ば':'は', 'び':'ひ', 'ぶ':'ふ', 'べ':'へ', 'ぼ':'ほ',
             'ぱ':'は', 'ぴ':'ひ', 'ぷ':'ふ', 'ぺ':'へ', 'ぽ':'ほ',
             'ぢ':'し', 'づ':'す',  'を':'お'}
    
    def rChar(s):                # rdictを用いて文字を正規化する関数
        str = ""
        for i in range(len(s)):
            if s[i] not in rdict.keys():
                str += s[i]
            elif s[i] in rdict.keys():
                str += rdict[s[i]]
        return str

    def _kaibun(s):
        if len(s) <=1:
            return True
        else:
            return s[0] == s[-1] and kaibun(s[1:-1])
    return _kaibun(rChar(s))

print(kaibun("わたしまけましたわ"))  # 私負けましたわ
print(kaibun("わたしはまけました"))  # 私は負けました
print(kaibun("いかたべたかい"))    # イカ食べたかい
print(kaibun("いかたべたいかい"))   # イカ食べたいかい
print(kaibun("あ"))
print(kaibun("ちばだいがく"))     # 千葉大学
print(kaibun("いい"))
print(kaibun("わるいてつさくがくさっているわ"))    # 悪い鉄柵が腐っているわ
print(kaibun("しらとりとらじ"))    # 白鳥取らじ