#include<bits/stdc++.h>
using namespace std;
int arr[100][100]; bool vstd[100][100]; int m,n,t;int mx=-1;
int rek(int x , int y)
{
    if (x==-1||y==-1||x==m||y==n){return 0;}
    if(arr[x][y]!=1)return 0;
    if(vstd[x][y]==1){return 0;}
    vstd[x][y]=1;
     return rek(x+1,y) + rek(x,y+1)   + rek(x-1,y)+ rek(x,y-1)+rek(x-1,y-1)+rek(x+1,y+1)+rek(x+1,y-1)+rek(x-1,y+1)+1;
}

int main()
{

    memset(vstd,0,sizeof (vstd));
    cin>>t;
    for(int i=0;i<t;i++)
    {
        cin>>m>>n;
        for(int j=0;j<m;j++)
        {
            for(int k=0;k<n;k++)
            {
                cin>>arr[j][k];
            }
        }
        for(int j=0;j<m;j++)
        {
            for(int k=0;k<n;k++)
            {
                if (arr[j][k]==1) mx = max(mx, rek(j,k));
            }
        }
        cout<<mx<<endl;
    }
}
