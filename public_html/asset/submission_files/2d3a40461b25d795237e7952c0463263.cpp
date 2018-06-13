#include <iostream>
#include <cstdio>
#include <algorithm>
using namespace std;

int fact(int a,int b){
    if (a == 0 || b == 0) return 1;
    else if (a == b) return b;
    else return a*fact(a-1,b);
}

int komb(int n,int r){
    if (r == 0 || n == r) return 1;
    else{
    int a = n-r;
    int j = max(a,r);
    int ans = fact(n,j+1) / fact(n-j,1);
    return ans;
    }
}

int pang(int a,int b){
    int ans=1;
    if (b == 0) return 1;
    else {
        for (int i=1; i<=b; i++){
            ans = ans * a;
        }
        return ans;
    }
}

int main(){
    int t;
    scanf("%d",&t);
    while (t--){
        int a,b;
        scanf("%d %d",&a,&b);
        int c=b,d=0,ans;
        while (d<=c){
            ans = komb(c,d) * pang(a,d);
            if (ans == 1 && b == 1) printf("x");
            if (ans == 1) printf("x%d",b);
            else if (b == 1) printf("%dx",ans);
            else if (ans == 0) printf(" ");
            else if (b == 0) printf("%d",ans);
            else printf("%dx%d",ans,b);
            if (d != c || ans != 0) printf(" ");
            d = d+1;
            b = b-1;
        }
        printf("\n");
    }
    return 0;
}
