initial_input = [["E", "T", "E'"],
                 ["E'", "+", "T", "E'", "e"],
                 ["T", "F", "T'"],
                 ["T'", "*", "F", "T'", "e"],
                 ["F", "(", "E", ")", "id"]]
initial_val=[]
for i in initial_input:
    initial_val.append(i)
alphabet = ['e', 'id']
first = []
found = []
follow=[]
follow_second=[]
def finding_first():
    for i in range(len(initial_input)):
        for ii in initial_input[i]:
            if ii == "e" or ii == "id":
                first.append([initial_input[i][0], initial_input[i][1], initial_input[i][len(initial_input[i]) - 1]])
                found.append(initial_input[i])
def removal():
    for i in initial_input:
        for j in found:
            if j == i:
                initial_input.remove(i)
    del initial_input[-1]
def non_terminal_ele():
    for i in initial_input:
        fis = i[1]
        for p in first:
            if fis == p[0]:
                first.append([i[0], p[1], p[2]])
                del initial_input[-1]
def finding_follow_first_step():
    follow.append(["E","$",")"])
    for i in initial_val:
        val=i[1:len(i)]
        if len(val)==2:#alpha A
            follow.append([val[1],'f('+i[0]+ ")"])
        else: #alpha A beta:first(A)=First(beta)
            for i in first:
                if val[2]==i[0]:
                    follow.append([val[1],i[1]])

    follow[2].append("f(E')")
    follow[4].append("f(T')")
def finding_follow_second_step():
    for i in follow:
        for p in i:
            if len(p)==4:
                    for s in follow:
                        if p[2]==str(s[0]):
                            del follow[follow.index(i)]
                            follow.append([i[0],s[1],s[2]])
                            break
def finding_follow_third_step():
    for i in follow:
        for p in i:
            if len(p) == 5:
                for s in follow:
                    # print("value",s[0])
                    if p[2]+p[3] == str(s[0]):
                        del follow[follow.index(i)]
                        try:
                            follow.append([i[0], i[1], s[1], s[2], s[3]])
                        except:
                            follow.append([i[0], i[1], s[1], s[2]])
                        break

if __name__ == '__main__':
    finding_first()
    removal()
    non_terminal_ele()
    non_terminal_ele()
    del found
    del initial_input
    finding_follow_first_step()
    finding_follow_second_step()
    finding_follow_third_step()
    finding_follow_third_step()
    print("The first is ", first)
    print("The follow is",follow)
