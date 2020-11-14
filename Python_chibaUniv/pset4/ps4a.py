# Problem Set 4A
# Name: LEE JIYEON
# Collaborators:
# Time Spent: x:xx

def get_permutations(sequence):

    if len(sequence) == 1:
        return [sequence]
    else:
        permutations =[]
        first_char = sequence[0]
        for element in get_permutations(sequence[1:]):
            elementList = list(element)
            for i in range(len(sequence)):
                elementListCopy = elementList[:]
                elementListCopy.insert(i,first_char)
                permutations.append("".join(elementListCopy))
    return sorted(permutations)

if __name__ == '__main__':

    example_input ='abc'
    print('input:',example_input)
    print('Expeted Output: ', ['abc', 'acb', 'bac', 'bca', 'cab', 'cba'])
    print('Actual Output: ', get_permutations(example_input))

    example_input ='cat'
    print('input:',example_input)
    print('Expeted Output: ', ['act', 'atc', 'cat', 'cta', 'tac', 'tca'])
    print('Actual Output: ', get_permutations(example_input))

    example_input ='bed'
    print('input:',example_input)
    print('Expeted Output: ', ['bde', 'bed', 'dbe', 'deb', 'ebd', 'edb'])
    print('Actual Output: ', get_permutations(example_input))


'''
if len(sequence) == 1:
        return [sequence]
    else:
        permutations =[]
        first_char = sequence[0]
        for element in get_permutations(sequence[1:]):
            elementList = list(element)
            for i in range(len(sequence)):
                elementListCopy = elementList[:]
                elementListCopy.insert(i,first_char)
                permutations.append("".join(elementListCopy))
    return permutations

'''