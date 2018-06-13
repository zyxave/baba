#include <iostream>
#include <cstdio>
#include <algorithm>
using namespace std;

int main(){
    int t;
    scanf("%d",&t);
    while (t--){
        int harga,kurang,minim,budget;
        scanf("%d %d %d %d",&harga,&kurang,&minim,&budget);
        int total=0,biaya=0;
        while (biaya+harga<=budget){
            biaya = biaya + harga;
            if (harga-kurang >= minim){
                harga = harga - kurang;
            }
            else {
                harga = minim;
            }
            total = total + 1;
        }
        printf("%d\n",total);
    }
    return 0;
}
