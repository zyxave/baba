#include <iostream>
#include <string>
#include <cmath>

using namespace std;

string name[13][105];
int minimal0[13][105];

int counting(int x, int y,int a,int b,int i, int j){
    int minimal,after;
    minimal = 0;
    after = 0;
    while(x > y){
        after = x / 2;
         if((after > y) && (b <= a*after)){
            x = after;
            minimal += b;
        }else{
            x--;
            minimal = minimal + a;
        }
    }
    minimal0[i][j] = minimal;

}

void sorting(int i, int n){
    int tempn;
    string temps;
    for(int j = 0; j < n; j++){
        for(int k = j+1; k < n; k++){
            if(minimal0[i][j] > minimal0[i][k]){
                tempn = minimal0[i][j];
                temps = name[i][j];
                minimal0[i][j] = minimal0[i][k];
                name[i][j] = name[i][k];
                minimal0[i][k] = tempn;
                name[i][k] = temps;
            }
            if(minimal0[i][j] == minimal0[i][k]){
                if(name[i][j] > name[i][k]){
                    temps = name[i][j];
                    name[i][j] = name[i][k];
                    name[i][k] = temps;
                }
            }
        }
    }
}


int main(){
    int t,x,y;
    int n[100];
    char f;
    cin >> t;
    for(int i = 0; i < t; i++){
        cin >> n[i] >> x >> y;
        for(int j = 0; j < n[i]; j++){
            int a, b;
            cin >> name[i][j] >> f >> a >> b;
            counting(x,y,a,b,i,j);
        }

        sorting(i,n[i]);
    }

    for(int k = 0; k < t; k++){
        for(int l = 0; l < n[k]; l++){
            cout << name[k][l] << " " << f << " " << minimal0[k][l] << endl;
        }
        cout << endl;
    }



    return 0;
}
