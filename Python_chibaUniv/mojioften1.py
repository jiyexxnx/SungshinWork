"""
#氏名：LEE JI YEON
#2019.11.18
#mojioften1.py
"""
text = "親譲りの無鉄砲で小供の時から損ばかりしている。" \
    "小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。" \
    "なぜそんな無闇をしたと聞く人があるかも知れぬ。" \
    "別段深い理由でもない。" \
    "新築の二階から首を出していたら、同級生の一人が冗談に、" \
    "いくら威張っても、そこから飛び降りる事は出来まい。" \
    "弱虫やーい。と囃したからである。" \
    "小使に負ぶさって帰って来た時、" \
    "おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、" \
    "この次は抜かさずに飛んで見せますと答えた。"

def string_to_frequencies(string):
    myDict = {}
    for word in string:
        if word in myDict:
           myDict[word] +=1
        else:
            myDict[word]=1
    return myDict

def most_common_moji(freqs):
    values = freqs.values()
    best = max(values)
    words = []
    for k in freqs:
        if freqs[k] == best:
            words.append(k)c
    return(words, best)

def moji_often(freqs, minTimes):
    result = []
    done = False
    while not done:
        temp = most_common_moji(freqs)
        if temp[1] >= minTimes:
            result.append(temp)
            for w in temp[0]:
                del(freqs[w])
        else:
            done = True
    return result

bocchan = string_to_frequencies(text)
print(moji_often(bocchan, 7))