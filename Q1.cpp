#include <bits/stdc++.h>
using namespace std;

void sub(bool ans, int ind, vector<int> v, int target){
    if(ind >= v.size()){
        if(target==0){
            ans=true;
        }
        return;
    }
    sub(ans, ind+1, v, target); // not selected
    for(int i=ind; i<v.size(); i++){
        if(v[i]>target){
            break;
        }
        sub(ans, i+1, v, target-v[ind]); // selected v[i]
        sub(ans, i+1, v, target); // not selected
    }
}

int main()
{
    ios_base::sync_with_stdio(false); cin.tie(0); cout.tie(0);

    int n; cin>>n;
    vector<int> v ;
    sort(v.begin(), v.end());
    for(int i=0; i<n; i++) {
        int x; cin>>x; v.push_back(x);
    }
    int target; cin>>target;

    /////////////////////////////////////////////
    bool ans=false;
    sub(ans, 0, v, target);
    cout<<ans;

    return 0;
}