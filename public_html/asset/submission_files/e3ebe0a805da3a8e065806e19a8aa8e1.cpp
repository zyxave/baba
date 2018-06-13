#include<bits/stdc++.h>
using namespace std;

int T, N, M, ans, A[10], i, j, k, L;
int main()
{
	cin>>T;
	for(i=1;i<=T;i++)
	{
		cin>>N>>M;
		ans=0;
		for(j=N;j<=M;j++)
		{
			A[1]=i%10;
			A[2]=(i/10)%10;
			A[3]=(i/100)%10;
			A[4]=(i/1000)%10;
			for(k=1;k<=4;k++)
			for(L=k+1;L<=4;L++)
			if(A[L]==A[k])ans++;
		}
		cout<<ans<<endl;
	}
}
