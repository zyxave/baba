#include <iostream>

using namespace std;

int main()
{
    int t,p,a,m,r,d,c,i;
    cin >> t;
    int q[t];
    for(i = 1;i <= t;i++)
    {
        d=0;
        c=0;
    cin >> p >> a >> m >> r;
    while(c < r)
    {
        if(p >= m)
        {
            c = c + p;
            p = p - a;
        }
        else
        {
           c = c + m;
        }
        d = d + 1;
    }
    if(c == r)
    {
        q[i] = d;
    }else
    {
        q[i] = d-1;
    }
    }
    for(i = 1;i <= t;i++)
    {
        cout << q[i] << endl;
    }
    cin.get();
    cin.get();
    return 0;
}
