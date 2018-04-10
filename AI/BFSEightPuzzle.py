goal_state = [0, 1, 2, 3, 4, 5, 6, 7, 8]
import numpy as np

class Node:
    child_nodes = []
    current_child = []
    puzzle = None
    parent = None
    x = 0

    move = None
    depth = None

    def __init__(self, puzzle, parent=None, move=None, depth=0):
        self.puzzle = puzzle

    def move_to_left(self, state, element):
        pc = []
        for data in state:
            pc.append(data)
        if (element % 3) > 0:
            temp = pc[element - 1]
            pc[element - 1] = pc[element]
            pc[element] = temp
            child = Node(pc)
            self.child_nodes.append(child)
            child.parent = state
            # print("The soring element is from left",pc)



    def move_to_right(self, state, element):
        pc = []
        for data in state:
            pc.append(data)
        if (element % 3) < 2:
            temp =pc[element + 1]
            pc[element + 1] = pc[element]
            pc[element] = temp
            child = Node(pc)
            self.child_nodes.append(child)
            child.parent = state
            # print("The soring element is from right", pc)
            # print("from inside")



    def move_to_up(self, state, element):
        pc = []
        for data in state:
            pc.append(data)
        if (element - 3) >= 0:
            temp = pc[element - 3]
            pc[element - 3] = pc[element]
            pc[element] = temp
            child = Node(pc)
            self.child_nodes.append(child)
            child.parent = state
            # print("The soring element is from up", pc)



    def move_to_down(self, state, element):
        pc = []
        for data in state:
            pc.append(data)
        if (element + 3) < 9:
            temp = pc[element + 3]
            pc[element + 3] = pc[element]
            pc[element] = temp
            child = Node(pc)
            self.child_nodes.append(child)
            child.parent = state
            # print("The soring element is from down", pc)



    def Expand_node(self):
        # print("The puzzle is",self.puzzle)
        for index, node in enumerate(self.puzzle):
            if node is 0:
                self.x = index
        # print("Element before calling right ",self.puzzle)
        self.move_to_right(self.puzzle, self.x)
        # print("Element after calling right ", self.puzzle)
        # print("Element before calling left ", self.puzzle)
        self.move_to_left(self.puzzle, self.x)
        # print("Element after calling left ", self.puzzle)
        # print("Element before calling up ", self.puzzle)
        self.move_to_up(self.puzzle, self.x)
        # print("Element after calling up ", self.puzzle)
        # print("Element before calling down ", self.puzzle)
        self.move_to_down(self.puzzle, self.x)
        # print("Element after calling down ", self.puzzle)

    def Issamepuzzle(self, puz):
        samepuzzle = True

        for i in range(len(puz)):
            if self.puzzle is not puz[i]:
                samepuzzle=False
        return  samepuzzle


class uniform_seach:
    def breadth_first_search(self, root):
        openlist = []
        closelist = []
        openlist.append(root)
        # print("The length of openlis is,", len(openlist))
        goal_found = False
        while len(openlist) > 0 and not goal_found:
            print("The size of openlist is ",len(openlist))
            current_node = openlist[0]

            del current_node.child_nodes[:]

            # print("The current node is",current_node.puzzle)
            # print("The current node child length is: ",len(current_node.child_nodes))

            closelist.append(current_node)
            # print("The size of closelis is ",len(closelist))
            poped=openlist.pop(0)
            # print("The poped element is: ")
            # print(np.reshape(poped.puzzle,(3,3)))
            current_node.Expand_node()
            # print(np.reshape(current_node.puzzle,(3,3)))

            length = len(current_node.child_nodes)
            print("the no of child is ",length)
            for i in range(length):
                # print("the element in close list is",len(closelist))
                current_child = current_node.child_nodes[i]
                if current_child.puzzle == goal_state:
                    goal_found = True
                    print("Goal found")
                # print("The boolean check is ",self.contains(openlist, current_node))
                # print("The boolean check is ", self.contains(closelist, current_node))
                # print("The current child is ", current_child.puzzle)
                openlist_check=self.checkin_openlist(openlist,current_child)
                closelist_check=self.checkin_openlist(closelist,current_child)
                if openlist_check==False and closelist_check==False:
                     print("This is called for appending")
                     openlist.append(current_child)
                # if (not self.contains(openlist, current_child) and not self.contains(closelist,current_child)):
                #      openlist.append(current_child)
                #
                #     # print("The current node puzzle", closelist[0].puzzle)
                # #     openlist[0].Issamepuzzle(current_child)
                # else:
                #    pass
    def checkin_openlist(self,list,child):
        contains=False
        # print("The size of openlist form function is ",len(list))
        for i in range(len(list)):
            if list[i].puzzle==child.puzzle:
                print("puzzle match")
                # print("puzzle match",list[i].puzzle)
                contains=True
        return contains

    def contains(self, openlist, c):
        contains = False
        for i in range(len(openlist)):
            if openlist[i].Issamepuzzle(c.puzzle):
                print("This is called")
                contains = True
        return  contains


def dfs():
    initial_state = [1, 2, 5, 3, 0, 4, 6, 7, 8]
    root_node = Node(initial_state)
    uniform = uniform_seach()
    uniform.breadth_first_search(root_node)


dfs()
