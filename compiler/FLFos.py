alphabet_dict={}
tree_store=[]
val=[]
storing_first_and_last_for_alphabet=[]
caching_first_and_last_pos=[]
character="*|"
delete_char="()"
nullable="*"
next_input=[]
followpos=[]
final_result=[]
class pos:
    left_node=None
    right_node=None
    parent=None
    def __init__(self,left_node,right_node,parent):
        self.left_node=left_node
        self.right_node=right_node
        self.parent=parent
def storing_on_the_basis_of_tree(data):
    left_node=data[0]
    parent=data[1]
    right_node=data[2]
    child=parent
    tree_store.append(pos(left_node,right_node,parent))
    next_node=data[3]
    tree_store.append(pos(child,None,next_node))
    start=4
    child=next_node
    for i in range(len(data)):
        parent=data[start]
        left_node=child
        right_node=data[start+1]
        child=parent
        tree_store.append(pos(left_node,right_node, parent))
        start=start+2
        if right_node == "#":
            break
def first_pos(firstpos_left,firstpos_right,left_node):
    if left_node == nullable:

        firstpos = str(firstpos_left) + str(firstpos_right)
    else:
        firstpos = str(firstpos_left)
    return firstpos
def last_pos(lastpos_left,lastpos_right,right_node):
    if right_node == nullable:
        lastpos = str(lastpos_left) +str(lastpos_right)
    else:
        lastpos = str(lastpos_right)
    return lastpos
def check_for_astrik(left_node,right_node):
    firstpos_left = None
    lastpos_left = None
    delete_first=None
    run=0
    for i in storing_first_and_last_for_alphabet:
        if left_node==i[0]:
            firstpos_left=i[1]
            lastpos_left=i[2]
            delete_first=i
            run=run+1
        if run==1:
            break
    storing_first_and_last_for_alphabet.pop(storing_first_and_last_for_alphabet.index(delete_first))
    first=firstpos_left
    last=lastpos_left
    storing_first_and_last_for_alphabet.insert(0, ["*", first, last])
    final_result.append(["*", first, last])
def followpos_astrik(alphabet_first_last,tree,first_last):
    for i in range(len(first_last)):
        check=first_last[i]
        if check[0]=="*":
            followpos.append([1,check[2]])
            followpos.append([2,check[2]])
def find_for_left_child(parent,node):

    for i in parent:
        if i[0]==node:
            index=parent.index(i)
            del parent[index]
            return i[2]
def find_for_right_child(alphabets,node):

    for i in alphabets:
        if i[0] == node:
            index=alphabets.index(i)
            del alphabets[index]
            return i[1]
def followpos_cat(alphabet_first_last,tree,first_last):
    index=3
    for i in range(2):
        del alphabet_first_last[0]


    for i in range(len(tree)):
        first_element=tree[i]
        if first_element.parent is ".":
            left_lastpos = find_for_left_child(first_last,first_element.left_node)
            right_firstpos = find_for_right_child(alphabet_first_last,first_element.right_node)
            if left_lastpos=="12":
                followpos[0][1]=left_lastpos+right_firstpos
                followpos[1][1] = left_lastpos + right_firstpos
            else:
                followpos.append([left_lastpos,right_firstpos])
def check_for_and(left_node,right_node):
    firstpos_left = None
    firstpos_right = None
    lastpos_left = None
    lastpos_right = None
    delete_first=None
    delete_second=None
    run = 0
    for i in storing_first_and_last_for_alphabet:
        if left_node == i[0]:
            firstpos_left = i[1]
            lastpos_left = i[2]
            delete_first=i
            # storing_first_and_last_for_alphabet.pop(storing_first_and_last_for_alphabet.index(i))
            run = run + 1
        elif right_node == i[0]:
            firstpos_right = i[1]
            lastpos_right = i[2]
            delete_second=i
            run = run + 1
        if run == 2:
            break
    storing_first_and_last_for_alphabet.pop(storing_first_and_last_for_alphabet.index(delete_first))
    storing_first_and_last_for_alphabet.pop(storing_first_and_last_for_alphabet.index(delete_second))
    first = str(firstpos_left)+ str(firstpos_right)
    last = str(lastpos_left)+str(lastpos_right)
    storing_first_and_last_for_alphabet.insert(0,["|",first,last])
    final_result.append(["|", first, last])
def check_for_dot(left_node,right_node):
    firstpos_left=None
    firstpos_right=None
    lastpos_left=None
    lastpos_right=None
    delete_first = None
    delete_second = None
    run=0
    for i in storing_first_and_last_for_alphabet:
        if left_node==i[0] :
            firstpos_left=i[1]
            lastpos_left=i[2]
            delete_first = i
            run=run+1
        elif right_node==i[0]:
            firstpos_right= i[1]
            lastpos_right= i[2]
            delete_second = i
            run=run+1
        if run==2:
            break

    storing_first_and_last_for_alphabet.pop(storing_first_and_last_for_alphabet.index(delete_first))
    storing_first_and_last_for_alphabet.pop(storing_first_and_last_for_alphabet.index(delete_second))
    first = first_pos(firstpos_left, firstpos_right, left_node)
    last = last_pos(lastpos_left, lastpos_right, right_node)
    final_result.append([".",first,last])
    storing_first_and_last_for_alphabet.insert(0,[".", first, last])

def Construction_of_dfa(followpos,state,df_State):
    D_state=[]
    follow_storing=[]
    check_match_e=False
    check_match_d=False
    d=''
    e=''
    for i in followpos:
        follow_storing.append(i[1])
    for i in range(len(df_State)):
        sd=str(df_State[i])
        for i in str(df_State[i]):
            for j in range(len(state)):
                if str(i)==str(state[j][0]):
                    if state[j][1]=='a':
                        for c in followpos:
                            if str(state[j][0])==str(c[0]):
                                d=d+c[1]
                    if state[j][1]=='b':
                        for c in followpos:
                            if str(state[j][0])==str(c[0]):
                                e = e + c[1]
        for i in follow_storing:
            if str(d)==str(i):
                check_match_d=True
            if str(e)==str(i):
                check_match_e=True
        if check_match_d==True:
            pass
        else:
            follow_storing.append(d)
        if check_match_e==True:
            pass
        else:
            follow_storing.append(e)
        D_state.append([sd,d,e])
        d=''
        e=''
    print("The Construction_of_dfa is: ")
    print(D_state)
    







if __name__ == '__main__':
    user_input="(a|b)*abb"
    for i in user_input:
        if i in delete_char:
            pass
        else:
            next_input.append(i)
    next_input.append("#")
    next_input.append("#")
    del user_input
    data=[]
    check=True
    insert=True
    index=0
    while check==True:
        first=next_input[index]
        middle=next_input[index+1]
        last=next_input[index+2]
        if middle in character:
            if insert==True:
                data.append(first)
            data.append(middle)
            data.append(last)
            index=index+2
            insert=False
        elif middle.isalpha():
            if insert==True:
                data.append(first)
            data.append(".")
            data.append(middle)
            index=index+1
        elif middle is "#":
            check=False
    data.append(".")
    data.append("#")
    naya=[]
    for i in data:
        if i is not "*":
            naya.append(i)
        else:
            naya.append(i)
            naya.append(".")
    value=1
    #first pos and last pos for alphabet
    for i in data:
        if i.isalpha() or i=="#":
            storing_first_and_last_for_alphabet.append([i,str(value),str(value)])
            caching_first_and_last_pos.append([i,str(value),str(value)])
            value=value+1
    storing_on_the_basis_of_tree(naya)
    first_element = tree_store[0]
    check_for_and(first_element.left_node, first_element.right_node)
    first_element = tree_store[1]
    check_for_astrik(first_element.left_node, first_element.right_node)
    first_element = tree_store[2]
    check_for_dot(first_element.left_node, first_element.right_node)
    first_element = tree_store[3]
    check_for_dot(first_element.left_node, first_element.right_node)
    first_element = tree_store[4]
    check_for_dot(first_element.left_node, first_element.right_node)
    first_element = tree_store[5]
    check_for_dot(first_element.left_node, first_element.right_node)
    #print(final_result)
    # print(caching_first_and_last_pos)
    followpos_astrik(caching_first_and_last_pos,tree_store,final_result)
    followpos_cat(caching_first_and_last_pos,tree_store,final_result)
    followpos.append([6,"-"])
    print("The followpos is: ")
    print(followpos)
    state=[[1,'a'],[2,'b'],[3,'a'],[4,'b'],[5,'b']]
    df_State = [123, 1234, 1235, 1236]
    Construction_of_dfa(followpos,state,df_State)
