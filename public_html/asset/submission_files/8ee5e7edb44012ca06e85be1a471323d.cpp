#include <stdio.h>
using namespace std;
int min(int a, int b)
{
    if(a > b) return b;
    else return a;
}
int getPrice(int X, int Y, int A, int B)
{
    if(X <= Y) return 0;
    if(X/2 > Y) {
        return min( (B+getPrice(X/2, Y, A, B)), (A+getPrice(X-1, Y, A, B))  );
    } else {
       return A+getPrice(X-1, Y, A, B);
    }
    return 0;
}

int main()
{
    int T;
    scanf("%i", &T);
    for(int op = 1; op <= T; op++) {
        int N, X, Y;
        scanf("%i %i %i", &N, &X, &Y);

        int FriendName[N][16], Biaya[N];
        for(int i = 0; i < N; i++) {
            int A, B;
            scanf("%s : %i %i", &FriendName[i], &A, &B);
            Biaya[i] = getPrice(X, Y, A, B);
        }
        int counter = 0;
        while(counter != N) {
            int selected = 0, minv = 10000;
            for(int i = 0; i < N; i++) {
                if(minv >= Biaya[i]) {
                    selected = i;
                }
            }
            printf("%s : %i\n", FriendName[selected], Biaya[selected]);
            Biaya[selected] = 99999;
            counter++;
        }
        printf("\n");
    }
    return 0;
}
