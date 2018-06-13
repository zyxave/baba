#include <stdio.h>
#include <cstring>
#include <bits/stdc++.h>
#include <stack>
#include <string.h>

using namespace std;

int main()
{
	int tc; 
	scanf("%d",&tc);
	for(int tmp=0;tmp<tc;tmp++)
	{
		int K,x,y,J=0,P=0,cek[100000];
		string H;
		char data[27];
		map <char , int> CEN;
		map <int , int> CENTU;
		bool stat,aman;
		memset(cek,0,sizeof(cek));
		
		cin>>H;
		K = H.length();
		for(x=0;x<K;x++)
		{
			CEN[H[x]]+=1;
			
			if(data[J]!=H[x])
			{
				J+=1;
				data[J] = H[x];
			}
		}
		
		//satu
		int fuck[J],arr[3];
		memset(arr,0,sizeof(arr));
		for(y=1;y<=J;y++)
		{
			fuck[y] = CEN[data[y]];
			CENTU[fuck[y]]+=1;
			if(arr[P]!=fuck[y]&&cek[fuck[y]]==0)
			{
				P+=1;
				cek[fuck[y]]=1;
				arr[P] = fuck[y];
				if(P>2)
				{
					stat=false;
					aman=true;
					break;		
				}
			
			}
		}
		
		if(P==1)
		{
			stat=true;	
			aman=true;	
		}

		
		int sinyal=0,temp;
		pair<int,int> keti[2];
		if(aman==false)
		{
			for(int z=1;z<=2;z++)
			{
				keti[z].first = arr[z];
				keti[z].second = CENTU[arr[z]];
				if(keti[z].second==1)
				{
					sinyal=1;
					temp=z;
				}
			}
			
			if(sinyal==0)
				stat=false;
		
			else
			{
				if(temp==1)
				{
					if(keti[1].first > keti[2].first && keti[1].first - keti[2].first==1 || keti[1].first == 1)
						stat=true;
					
					else
						stat=false;
				}
				
				else
				{
					if(keti[2].first > keti[1].first && keti[2].first - keti[1].first==1 || keti[2].first == 1)
						stat=true; 
					else
						stat=false;
				}
			}
		}
		
		
		//final
		if(stat==true)
			printf("YES\n");
		else
			printf("NO\n");
	}
	
		
}
