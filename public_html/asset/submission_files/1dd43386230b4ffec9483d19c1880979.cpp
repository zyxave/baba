#include <iostream>
#include <stdlib.h>

using namespace std;

int main()
{
    int t,n,d,r,l,i,g;
    cin >> t;
    int q[t];
    for(i = 1;i <= t;i++)
    {
    g = 0;
    cin >> n >> d >> r;
    int a[n],b[n];
    for(l = 1;l <= n;l++)
    {
        cin >> a[l];
    }
    for(l = 1;l <= n;l++)
    {
        cin >> b[l];
    }
    for(l = 1 ;l <= n;l++)
    {
        g = (((a[l] + b[l]) -10)* r)+g;
    }
    q[i] = g;
    }
    for(i = 1;i<=t;i++)
    {
        cout << q[i] << endl;
    }
    cin.get();
    cin.get();
    return 0;
}
