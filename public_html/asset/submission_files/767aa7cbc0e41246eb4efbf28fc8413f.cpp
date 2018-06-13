#include <iostream>

using namespace std;

int number[105];

int main(){
    int t, p , m , a, r;
    cin >> t;
    for(int i = 0; i < t; i++){
        int many = 0;
        cin >> p >> a >> m >> r;
        while(r >= p){
            r -= p;
            many++;
            if(p-a > m){
                p -= a;
            }else if(p-a <= m){
                p = m;
            }
        }
        number[i] = many;
    }
    for(int j = 0; j < t; j++){
        cout << number[j] << endl;
    }

    return 0;
}
