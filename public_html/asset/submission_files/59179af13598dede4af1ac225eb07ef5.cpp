#include <iostream>
#include <string>
#include <cstdlib>

using namespace std;

int main(){
    ios::sync_with_stdio(false);
    int t;
    cin>>t;
    if (t>=10){
        cout<<"t < 10!";
        exit(0);
    }
    string s[t];
    int jml[t][100];
    string jwb;
    for(int i = t; i--;)
        cin>>s[i];
    for(int i = t; i--;){
        bool d = true;
        for(int j = s[i].size(); j--;){
            jml[i][j] = 0;
            jwb = "yes";
            for(int k = s[i].size(); k--;){
                if(s[i].substr(j,1) == s[i].substr(k,1))
                    jml[i][j] = jml[i][j] + 1;
            }
            int a = jml[i][s[i].size() - 1];
            int b = jml[i][j];
            int c = 0;
            if(a != b){
                if(b>a){
                    c=b;
                    b=a;
                    a=c;
                }
                if (d == true){
                    if(a - 1 != b){
                        if(a != b - 1){
                            jwb = "no";
                        }else
                            d = false;
                    }else
                        d = false;
                } else
                    jwb = "no";
            }
        }
        cout<<jwb<<endl;
    }
    return 0;
}
