#include <iostream>
#include <conio.h>
#include <stdio.h>

using namespace std;

int main() {
        int jumlah = 0;
        cout << "Jumlah Inputan:\n>";
        cin >> jumlah;
        int i = 0;
        int nilai[jumlah];
        while(i<jumlah){
            cin>>nilai[i];
            i++;
        }

        for(int i=0;i<jumlah;i++){
            if(nilai[i] % 2 == 0){
                cout << nilai[i] - (nilai[i] / 2 - 1);
            }else{
                cout << 1;
            }
            cout << endl;
        }

        return 0;
}

