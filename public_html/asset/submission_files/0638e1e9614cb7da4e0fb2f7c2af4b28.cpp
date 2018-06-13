#include <iostream>
using namespace std;
int abs(int n)
{
    if(n < 0) return -n;
    return n;
}

int main()
{
    int T;
    cin >> T;
    for(int op = 1; op <= T; op++) {
        int N, P, Q, R;
        cin >> N >> P >> Q >> R;
        int X[N], Y[N], Z[N];
        int biaya = 0;
        for(int i = 0; i < N; i++)
        {
            cin >> X[i] >> Y[i] >> Z[i];
            if(abs(X[i]-Y[i]) <= abs(P-Q) && abs(X[i]-Y[i]) % abs(P-Q) == 0)
            if(biaya < abs(X[i]-Y[i])*Z[i]) {
                biaya = abs(X[i]-Y[i])*Z[i];
            }
        }
            cout << biaya << endl;
    }
    return 0;
}
