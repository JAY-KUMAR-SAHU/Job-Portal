#include <bits/stdc++.h>
using namespace std;

#define vi vector<int>
#define vvi vector<vector<int>>

struct Node {
    int data;
    struct Node * left, * right;

    Node(int val){
        data=val;
        left=right=NULL;
    }
};

vvi levelorder(Node * root){
    vvi ans;
    if(root == NULL) return ans;

    queue<Node*> q;
    q.push(root);

    while(!q.empty()){
        int size = q.size();
        vi level;

        for(int i=0; i<size; i++){
            Node * node = q.front();
            q.pop();
            level.push_back(node->data);
            
            if(node->left!=NULL) q.push(node->left);
            if(node->right!=NULL) q.push(node->right);
        }

        ans.push_back(level);
    }
    return ans;
}

int main()
{                   
    struct Node * root = new Node(1);
    root->left = new Node(2);
    root->left->left = new Node(3);
    root->left->left->right = new Node(4);
    root->left->left->right->left = new Node(5);
    root->left->left->right->right = new Node(6);
    root->right = new Node(7);
    root->right->right = new Node(8);
    root->right->right->left = new Node(9);
    root->right->right->left->left = new Node(10);
    root->right->right->left->right = new Node(11);
    //                   ROOT
    //                     1
    //                   /   \ 
    //                 2       7 
    //               /           \ 
    //             3               8 
    //               \           / 
    //                 4       9 
    //               /   \    /  \ 
    //             5      6  10  11 

    
    vector<vector<int>> leveltrav = levelorder(root);
    //levelorder traversal __________
    for(auto i : leveltrav){
        for(auto j : i)
            cout<<j<<' ';
        cout<<endl;
    }

    return 0;
}