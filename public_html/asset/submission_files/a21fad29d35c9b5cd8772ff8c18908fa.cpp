#include <iostream>

using namespace std;

int Co[1001];

int Reverse(int x){
    int temp, ret;
    temp = x;
    ret = 0;
    while (temp > 0){
        ret = (ret * 10) + (temp % 10);
        temp = temp / 10;
    }
    return ret;
}

void Count(int n, int i){
    int coun, Ri, Rn;
    coun = 0;
    Rn = Reverse(n);
    for(int i = 1; i <= n; i++){
        Ri = Reverse(i);
        coun++;
        if((Ri > i) && (Ri <= n) && ((Rn % 10 == i % 10)) && (n > 20) && (n < 100)) {
            coun++;
            i = Ri;
        }
    }
    Co[i] = coun;
}



int main(){
    int t,n;
    cin >> t;
    for(int i = 0; i < t; i++){
        cin >> n;
        Count(n,i);
    }
    for(int j = 0; j < t; j++){
        cout << Co[j] << endl;
    }
    return 0;
}
