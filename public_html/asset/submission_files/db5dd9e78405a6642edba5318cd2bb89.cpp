#include<iostream>
#include<stdio.h>
#include<algorithm>
#include<math.h>
using namespace std;

int main()
{
    int t,a,b,c;
    cin>>t;
    while(t--)
    {
     int d=0;
     cin>>a;
     cin>>b;
     c=a-b;
     d=d+c/100+(c%100/20)+(c%20/5)+(c%5);
     cout<<d<<endl;
    }

    return 0;
}
