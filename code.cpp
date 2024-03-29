#include <bits/stdc++.h>
using namespace std;

class myVector{
  private:
    int size=0;
    int capacity=2;
    int arr[capacity];

  public:
    myVector(){
      int arr[capacity];
    }

    void push_back(int value){
      if(size==capacity){
        capacity*=2;
        int *newArr = new int[capacity];
        for(int i=0; i<size; i++){
          newArr[i]=arr[i];
        }
        delete arr;
        arr=newArr;
      }
      arr[size++]==value;
    }
};

int main(){
  ios_base::sync_with_stdio(false); cin.tie(0); cout.tie(0);

  
  return 0;
}